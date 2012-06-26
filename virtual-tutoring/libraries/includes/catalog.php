<?php

//This file cannot be called directly, only included.
if (str_replace(DIRECTORY_SEPARATOR, "/", __FILE__) == $_SERVER['SCRIPT_FILENAME']) {
    exit;
}

//Add items to cart.
if (isset($_GET['fct'])) {
    $lessons = array();
    $courses = array();
    $result = eF_getTableData("lessons", "*", "active=1 and publish=1");
    foreach ($result as $value) {
        $lessons[$value['id']] = $value;
    }
    $result = eF_getTableData("courses", "*", "active=1 and publish=1");
    foreach ($result as $value) {
        $courses[$value['id']] = $value;
    }

    $legalLessonValues = array_keys($lessons);
    $legalCourseValues = array_keys($courses);
    $legalBuyTypes = array('lesson', 'course', 'credit');

    $cart = cart :: retrieveCart();

    if ($_GET['fct'] == 'addToCart') {
        if ($_GET['type'] == 'lesson' && isset($_GET['id']) && in_array($_GET['id'], $legalLessonValues)) {
         unset($cart['credit']);
            $lesson = new EfrontLesson($lessons[$_GET['id']]);
            //Recurring items cannot coexist with anything else in the cart!
            if ($lesson -> options['recurring']) {
                unset($cart);
            }
            $cart['lesson'][$_GET['id']] = $_GET['id'];
        } elseif ($_GET['type'] == 'course' && isset($_GET['id']) && in_array($_GET['id'], $legalCourseValues)) {
         unset($cart['credit']);
            $course = new EfrontCourse($courses[$_GET['id']]);
            //Recurring items cannot coexist with anything else in the cart!
            if ($course -> options['recurring']) {
                unset($cart);
            }
            $cart['course'][$_GET['id']] = $_GET['id'];
        } elseif ($_GET['type'] == 'credit' && isset($_GET['id'])) {
         $localeSettings = localeconv();
         $_GET['id'] = str_replace($localeSettings['decimal_point'], '.', $_GET['id']);
         if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
          unset($cart);
             $cart['credit'] += $_GET['id'];
         }
        }
    } else if ($_GET['fct'] == 'removeFromCart' && in_array($_GET['type'], $legalBuyTypes)) {
        if ($_GET['type'] == 'lesson' && isset($_GET['id']) && in_array($_GET['id'], $legalLessonValues)) {
            unset($cart['lesson'][$_GET['id']]);
        } elseif ($_GET['type'] == 'course' && isset($_GET['id']) && in_array($_GET['id'], $legalCourseValues)) {
            unset($cart['course'][$_GET['id']]);
        } elseif ($_GET['type'] == 'credit') {
            unset($cart['credit']);
        }
    } else if ($_GET['fct'] == 'removeAllFromCart') {
        unset($cart);
    }

    if (isset($cart)) {
        $smarty -> assign("T_CART", cart :: prepareCart($cart));
        cart :: storeCart($cart);
    } else {
        $smarty -> assign("T_CART", false);
        cart :: storeCart();
    }

    $smarty -> display("includes/blocks/cart.tpl");
    //It's always an ajax function
    exit;
} else if (isset($_GET['return_paypal'])) {
    if (isset($_GET['cart_entry']) && isset($_GET['product_type'])) {

    } else {
     cart :: storeCart();
     unset($_SESSION['previousMainUrl']);
     eF_redirect(G_SERVERNAME.'studentpage.php?message='.urlencode(_TRANSACTIONCOMPLETELESSONSWILLBEASSIGNED).'&message_type=success');
    }

} else if (isset($_GET['checkout'])) {
    $currentUser = EfrontUserFactory::factory($_SESSION['s_login']);
    if ($currentUser -> user['user_type'] != 'administrator') {
     $lessons = $currentUser -> getEligibleNonLessons();
     //$courses = $currentUser -> getEligibleNonCourses();
     $constraints = array('active' => 1, 'archive' => 0, 'condition' => 'c.show_catalog=1 and c.publish=1 and r.courses_ID is null or r.archive != 0');
     $constraints['return_objects'] = false;
     $courses = $currentUser -> getUserCoursesIncludingUnassigned($constraints);
     $temp = array();
     foreach ($courses as $value) {
      $temp[$value['id']] = $value;
     }
     $courses = $temp;
    } else {
        $lessons = $courses = array();
    }

    $cart = cart :: prepareCart(false);
 if (!cart :: compactCart($cart)) {
  eF_redirect("userpage.php?ctg=lessons&catalog=1");
 }

 $cart = cart :: filterCart($cart, $lessons, $courses);
    cart :: storeCart($cart);

    if (empty($cart)) {
        eF_redirect(basename($_SESSION['s_type'])."page.php?ctg=lessons&message=".rawurlencode(_SORRYYOUALREADYHAVETHELESSONSYOUSELECTED)."&message_type=failure", true);
    }

    $cart = cart :: prepareCart(false);
    $smarty -> assign("T_CART", $cart);
    if ($currentUser -> user['balance'] && $GLOBALS['configuration']['enable_balance']) {
        $smarty->assign("T_BALANCE", formatPrice($currentUser -> user['balance']));
        //$currentUser->getUserBalance();
    }

    $totalPrice = $cart['total_price'];
    if (isset($_GET['coupon'])) {
     try {
      if ($_GET['coupon']) {
       $coupon = new coupons($_GET['coupon'], true);
       if (!$coupon -> checkEligibility()) {
        throw new Exception(_INVALIDCOUPON);
       }
       $totalPrice = round($totalPrice * (1 - $coupon -> {$coupon -> entity}['discount'] / 100), 2);
       echo json_encode(array('id' => $coupon -> {$coupon -> entity}['id'],
               'price' => $totalPrice,
               'price_string' => formatPrice($totalPrice)));
      } else {
       echo json_encode(array('id' => '',
               'price' => $totalPrice,
               'price_string' => formatPrice($totalPrice)));
         }
     } catch (Exception $e) {
      header("HTTP/1.0 500 ");
      echo _INVALIDCOUPON;
     }
     exit;
    }

    //$form = new HTML_QuickForm("checkout_form", "post", basename($_SERVER['PHP_SELF']).'?ctg=lessons&catalog=1&checkout=1', "", null, true);
    if (basename($_SERVER['PHP_SELF']) == 'index.php') {
        $target = basename($_SERVER['PHP_SELF']).'?ctg=checkout&checkout=1&register_lessons=1';
        $cancelReturn = G_SERVERNAME.$target."&message=".urlencode(_YOUHAVECANCELLEDTHETRANSACTION);
    } else {
        $target = basename($_SERVER['PHP_SELF']).'?ctg=lessons&catalog=1&checkout=1';
        $cancelReturn = G_SERVERNAME.'studentpage.php?message='.urlencode(_YOUHAVECANCELLEDTHETRANSACTION);
    }
    $form = new HTML_QuickForm("my_checkout_form", "post", $target, "", 'style = "display:inline"', true);
        if ($totalPrice > 0) {
            $form -> addElement('submit', 'submit_order', _ENROLL, 'class = "flatButton"');
        } else {
            $form -> addElement('submit', 'submit_order', _FREEREGISTRATION, 'class = "flatButton"');
        }
    $nonFreeLessons = $freeLessons = array();
    foreach ($cart['lesson'] as $key => $value) {
     //Remove the lesson from the cart if it's not eligible
     if (!$value['show_catalog'] || !$value['active'] || !$value['publish'] || $value['course_only']) {
      //Do nothing, simpy bypassing lesson
     } else if (!$value['price']) {
      $freeLessons[] = $key;
     } else {
      $nonFreeLessons[] = $key;
     }
    }
    $nonFreeCourses = $freeCourses = array();
    foreach ($cart['course'] as $key => $value) {
     //Remove the course from the cart if it's not eligible
     if ((!$value['show_catalog'] && $course -> course['instance_source']) || !$value['active'] || !$value['publish']) {
      //Do nothing, simpy bypassing course
     } else if (!$value['price']) {
      $freeCourses[] = $key;
     } else {
      $nonFreeCourses[] = $key;
     }
    }
    if (!$GLOBALS['configuration']['enable_cart'] && (sizeof($freeLessons) > 0 || sizeof($freeCourses) > 0)) {
     try {
      if (sizeof($freeLessons) > 0) {
       $currentUser -> addLessons($freeLessons, array_fill(0, sizeof($freeLessons), 'student'), true);
      }
      if (sizeof($freeCourses) > 0) {
       $currentUser -> addCourses($freeCourses, array_fill(0, sizeof($freeCourses), 'student'), true);
      }
      unset($freeLessons);unset($freeCourses);
      if (sizeof($nonFreeCourses) == 0 && sizeof($nonFreeLessons) == 0) {
       unset($cart['lesson'][$key]);
       unset($cart['course'][$key]);
       cart :: storeCart($cart);
       if (basename($_SERVER['PHP_SELF']) == 'index.php') {
        eF_redirect($_SESSION['s_type']."page.php?ctg=lessons&message=".rawurlencode(_SUCCESSFULLYENROLLED)."&message_type=success");
       } else {
        eF_redirect(basename($_SERVER['PHP_SELF'])."?ctg=lessons&message=".rawurlencode(_SUCCESSFULLYENROLLED)."&message_type=success");
       }
      } else {
       //$message = _FREELESSONSANDCOURSESWHEREASSIGNEDPLEASEREVIEWNONFREE;
       if (basename($_SERVER['PHP_SELF']) == 'index.php') {
        eF_redirect(basename($_SERVER['PHP_SELF']).'?ctg=checkout&checkout=1&register_lessons=1&message='.rawurlencode(_FREELESSONSANDCOURSESWHEREASSIGNEDPLEASEREVIEWNONFREE)."&message_type=success");
       } else {
        eF_redirect(basename($_SERVER['PHP_SELF']).'?ctg=lessons&catalog=1&checkout=1&message='.rawurlencode(_FREELESSONSANDCOURSESWHEREASSIGNEDPLEASEREVIEWNONFREE)."&message_type=success");
       }
      }
     } catch (Exception $e) {
      handleNormalFlowExceptions($e);
     }
    }
    if ($form -> isSubmitted() && $form -> validate()) {
     try {
      unset($cart['lesson']);
      unset($cart['course']);
            //First, assign free lessons/courses, whatever happens
            if (sizeof($freeLessons) > 0) {
                $currentUser -> addLessons($freeLessons, array_fill(0, sizeof($freeLessons), 'student'), true);
            }
            if (sizeof($freeCourses) > 0) {
                $currentUser -> addCourses($freeCourses, array_fill(0, sizeof($freeCourses), 'student'), true);
            }
            if (isset($cart)) {
                $smarty -> assign("T_CART", cart :: prepareCart($cart));
            }
            if (sizeof($nonFreeLessons) > 0 || sizeof($nonFreeCourses) > 0) {
                if (isset($_POST['submit_checkout_balance'])) {
                 $message = _SUCCESSFULLYENROLLED;
                 if ($form -> exportValue('coupon') && $coupon = new coupons($form -> exportValue('coupon'), true)) {
         if (!$coupon -> checkEligibility()) {
          throw new Exception(_INVALIDCOUPON);
         }
         if (!$GLOBALS['configuration']['paypalbusiness']) { //If we have paypal, the reduction is already done
                      $totalPrice = $totalPrice * (1 - $coupon -> {$coupon -> entity}['discount'] / 100);
         }
                    }
                    if ($currentUser -> user['balance'] < $totalPrice) {
                        throw new EfrontPaymentsException(_INADEQUATEBALANCE, EfrontPaymentsException::INADEQUATE_BALANCE);
                    }
                    if (sizeof($nonFreeLessons) > 0) {
                        $currentUser -> addLessons($nonFreeLessons, array_fill(0, sizeof($nonFreeLessons), 'student'), true);
                    }
                    if (sizeof($nonFreeCourses) > 0) {
                        $currentUser -> addCourses($nonFreeCourses, array_fill(0, sizeof($nonFreeCourses), 'student'), true);
                    }
                    $currentUser -> user['balance'] = $currentUser -> user['balance'] - $totalPrice;
                    $currentUser -> persist();
                    $fields = array("amount" => $totalPrice,
                           "timestamp" => time(),
                           "method" => "balance",
                                 "status" => "completed",
                           "users_LOGIN" => $currentUser -> user['login'],
                        "lessons" => $nonFreeLessons,
                        "courses" => $nonFreeCourses);
                    $payment = payments :: create($fields);
                    if ($coupon) {
                     $coupon -> useCoupon($currentUser, $payment, array('lessons' => $nonFreeLessons, 'courses' => $nonFreeCourses));
                    }
                } else {
                    //Assign new lessons as inactive
                    if (sizeof($nonFreeLessons) > 0) {
                        $currentUser -> addLessons($nonFreeLessons, array_fill(0, sizeof($nonFreeLessons), 'student'), false);
                    }
                    if (sizeof($nonFreeCourses) > 0) {
                        $currentUser -> addCourses($nonFreeCourses, array_fill(0, sizeof($nonFreeCourses), 'student'), false);
                    }
                    $message = _ADMINISTRATORCONFIRMENROLLED;
                }
            }
            cart :: storeCart($cart);
            if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                eF_redirect($_SESSION['s_type']."page.php?ctg=lessons&message=".rawurlencode($message)."&message_type=success");
            } else {
                eF_redirect(basename($_SERVER['PHP_SELF'])."?ctg=lessons&message=".rawurlencode($message)."&message_type=success");
            }
        } catch (Exception $e) {
         handleNormalFlowExceptions($e);
        }
    }
    $renderer = new HTML_QuickForm_Renderer_ArraySmarty($smarty);
    $form -> accept($renderer);
    $smarty -> assign('T_CHECKOUT_FORM', $renderer -> toArray());
} else {
    //$smarty -> display("includes/catalog.tpl");
}
