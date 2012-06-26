<?php /* Smarty version 2.6.26, created on 2012-05-16 07:19:23
         compiled from includes/blocks/lessons_info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'includes/blocks/lessons_info.tpl', 5, false),)), $this); ?>
 <?php if ($this->_tpl_vars['T_CONFIGURATION']['enable_cart'] && ! $this->_tpl_vars['T_CONFIGURATION']['disable_payments']): ?><?php $this->assign('cart_image', "shopping_basket_add.png"); ?><?php else: ?><?php $this->assign('cart_image', "add.png"); ?><?php endif; ?>

 <?php if ($this->_tpl_vars['T_LESSON_INFO']): ?>
         <?php $_from = $this->_tpl_vars['T_LESSON_INFO']->metadataArray; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['info_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['info_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['info_list']['iteration']++;
?>
          <?php if ($this->_tpl_vars['item']): ?><div class = "lessonInfo"><span class = "infoTitle"><?php echo $this->_tpl_vars['T_LESSON_INFO']->metadataAttributes[$this->_tpl_vars['key']]; ?>
:</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "<br />") : smarty_modifier_replace($_tmp, "\n", "<br />")); ?>
</div><?php endif; ?>
         <?php endforeach; endif; unset($_from); ?>
          <?php if ($this->_tpl_vars['T_LANGUAGES'][$this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['language']]): ?><div class = "lessonInfo"><span class = "infoTitle"><?php echo @_LANGUAGE; ?>
:</span> <?php echo $this->_tpl_vars['T_LANGUAGES'][$this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['language']]; ?>
</div><?php endif; ?>
          <?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['professors_string']): ?><div class = "lessonInfo"><span class = "infoTitle"><?php echo @_PROFESSORS; ?>
:</span> <?php echo $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['professors_string']; ?>
</div><?php endif; ?>
          <?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['content'] || $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['tests'] || $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['projects']): ?>
           <?php echo '<div class = "lessonInfo">'; ?><?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['content']): ?><?php echo '<span class = "infoTitle">'; ?><?php echo @_UNITS; ?><?php echo ':</span> '; ?><?php echo $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['content']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['tests']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['content']): ?><?php echo ','; ?><?php endif; ?><?php echo ' <span class = "infoTitle">'; ?><?php echo @_TESTS; ?><?php echo ':</span> '; ?><?php echo $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['tests']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['projects']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['content'] || $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['tests']): ?><?php echo ','; ?><?php endif; ?><?php echo ' <span class = "infoTitle">'; ?><?php echo @_PROJECTS; ?><?php echo ':</span> '; ?><?php echo $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO']['projects']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</div>
    <?php endif; ?>
         <?php if ($this->_tpl_vars['T_CONTENT_TREE']): ?>
          <fieldset class = "fieldsetSeparator">
              <legend><?php echo @_LESSONCONTENT; ?>
</legend>
              <?php echo $this->_tpl_vars['T_CONTENT_TREE']; ?>

          </fieldset>
         <?php endif; ?>
  <?php if (! $this->_tpl_vars['T_LESSON']->lesson['course_only'] && ( ! $this->_tpl_vars['T_CURRENT_USER'] || $this->_tpl_vars['T_CURRENT_USER']->user['user_type'] == 'student' )): ?>
          <div id = "buy">
      <?php if ($this->_tpl_vars['T_LESSON']->lesson['price']): ?>
          <?php if ($this->_tpl_vars['T_HAS_LESSON']): ?>
              <span><?php echo $this->_tpl_vars['T_LESSON']->lesson['price_string']; ?>
</span>
              <img class = "ajaxHandle inactiveImage" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_YOUALREADYHAVETHISLESSON; ?>
" alt = "<?php echo @_YOUALREADYHAVETHISLESSON; ?>
" onclick = "alert('<?php echo @_YOUALREADYHAVETHISLESSON; ?>
')">
             <?php else: ?>
              <span><?php echo $this->_tpl_vars['T_LESSON']->lesson['price_string']; ?>
</span>
              <img class = "ajaxHandle" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_ADDTOCART; ?>
" alt = "<?php echo @_ADDTOCART; ?>
" onclick = "addToCart(this, '<?php echo $this->_tpl_vars['T_LESSON']->lesson['id']; ?>
', 'lesson');<?php if (! $this->_tpl_vars['T_CONFIGURATION']['enable_cart']): ?>location=redirectLocation<?php endif; ?>">
             <?php endif; ?>
         <?php else: ?>
          <?php if ($this->_tpl_vars['T_HAS_LESSON']): ?>
              <span><?php echo $this->_tpl_vars['T_LESSON']->lesson['price_string']; ?>
</span>
              <img class = "ajaxHandle inactiveImage" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_YOUALREADYHAVETHISLESSON; ?>
" alt = "<?php echo @_YOUALREADYHAVETHISLESSON; ?>
" onclick = "alert('<?php echo @_YOUALREADYHAVETHISLESSON; ?>
')">
             <?php elseif (! $this->_tpl_vars['T_CONFIGURATION']['disable_payments']): ?>
              <span><?php echo @_FREEOFCHARGE; ?>
</span>
              <img class = "ajaxHandle" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_ENROLL; ?>
" alt = "<?php echo @_ENROLL; ?>
" onclick = "addToCart(this, '<?php echo $this->_tpl_vars['T_LESSON']->lesson['id']; ?>
', 'lesson');<?php if (! $this->_tpl_vars['T_CONFIGURATION']['enable_cart']): ?>location=redirectLocation<?php endif; ?>">
             <?php else: ?>
              <span><?php echo @_ENROLL; ?>
</span>
              <img class = "ajaxHandle" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_ENROLL; ?>
" alt = "<?php echo @_ENROLL; ?>
" onclick = "addToCart(this, '<?php echo $this->_tpl_vars['T_LESSON']->lesson['id']; ?>
', 'lesson');<?php if (! $this->_tpl_vars['T_CONFIGURATION']['enable_cart']): ?>location=redirectLocation<?php endif; ?>">
             <?php endif; ?>
         <?php endif; ?>
          </div>
        <?php elseif ($this->_tpl_vars['T_LESSON']->lesson['course_only']): ?>
          <div id = "buy">
          <?php if ($this->_tpl_vars['T_COURSE']->course['price']): ?>
              <?php if ($this->_tpl_vars['T_HAS_COURSE']): ?>
                  <span><?php echo @_YOULAREDYHAVETHECOURSE; ?>
 &quot;<?php echo $this->_tpl_vars['T_COURSE']->course['name']; ?>
&quot;</span>
                  <img class = "ajaxHandle inactiveImage" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
" alt = "<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
" onclick = "alert('<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
')">
                 <?php else: ?>
                  <span><?php echo @_GETTHECOURSE; ?>
 &quot;<?php echo $this->_tpl_vars['T_COURSE']->course['name']; ?>
&quot;, <?php echo $this->_tpl_vars['T_COURSE']->course['price_string']; ?>
</span>
                  <img class = "ajaxHandle" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_ADDTOCART; ?>
" alt = "<?php echo @_ADDTOCART; ?>
" onclick = "addToCart(this, '<?php echo $this->_tpl_vars['T_COURSE']->course['id']; ?>
', 'course');<?php if (! $this->_tpl_vars['T_CONFIGURATION']['enable_cart']): ?>location=redirectLocation<?php endif; ?>">
                 <?php endif; ?>
          <?php else: ?>
              <?php if ($this->_tpl_vars['T_HAS_COURSE']): ?>
                  <span><?php echo @_YOULAREDYHAVETHECOURSE; ?>
 &quot;<?php echo $this->_tpl_vars['T_COURSE']->course['name']; ?>
&quot; <?php echo $this->_tpl_vars['T_COURSE']->course['price_string']; ?>
</span>
                  <img class = "ajaxHandle inactiveImage" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
" alt = "<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
" onclick = "alert('<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
')">
              <?php elseif (! $this->_tpl_vars['T_CONFIGURATION']['disable_payments']): ?>
                  <span><?php echo @_GETTHECOURSE; ?>
 &quot;<?php echo $this->_tpl_vars['T_COURSE']->course['name']; ?>
&quot;, <?php echo @_FREEOFCHARGE; ?>
</span>
                  <img class = "ajaxHandle" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_ENROLL; ?>
" alt = "<?php echo @_ENROLL; ?>
" onclick = "addToCart(this, '<?php echo $this->_tpl_vars['T_COURSE']->course['id']; ?>
', 'course');<?php if (! $this->_tpl_vars['T_CONFIGURATION']['enable_cart']): ?>location=redirectLocation<?php endif; ?>">
     <?php else: ?>
                  <span><?php echo @_GETTHECOURSE; ?>
 &quot;<?php echo $this->_tpl_vars['T_COURSE']->course['name']; ?>
&quot;, <?php echo @_ENROLL; ?>
</span>
                  <img class = "ajaxHandle" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_ENROLL; ?>
" alt = "<?php echo @_ENROLL; ?>
" onclick = "addToCart(this, '<?php echo $this->_tpl_vars['T_COURSE']->course['id']; ?>
', 'course');<?php if (! $this->_tpl_vars['T_CONFIGURATION']['enable_cart']): ?>location=redirectLocation<?php endif; ?>">
                 <?php endif; ?>
       <?php endif; ?>
    </div>
          <div>
           <div class = "lessonInfo"><span class = "infoTitle"><?php echo @_LESSONPARTOFCOURSES; ?>
:</span>
         <?php $_from = $this->_tpl_vars['T_LESSON_COURSES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lesson_courses'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lesson_courses']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['lesson_courses']['iteration']++;
?>
          <a class = "editLink" href = "<?php echo $_SERVER['PHP_SELF']; ?>
?<?php if ($_GET['ctg']): ?>ctg=<?php echo $_GET['ctg']; ?>
&<?php endif; ?>courses_ID=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
<?php if (! ($this->_foreach['lesson_courses']['iteration'] == $this->_foreach['lesson_courses']['total'])): ?>,<?php endif; ?></a>
         <?php endforeach; endif; unset($_from); ?>
           </div>
          </div>
        <?php endif; ?>
    <?php elseif ($this->_tpl_vars['T_COURSE_INFO']): ?>

  <?php ob_start(); ?>
         <?php if (! $this->_tpl_vars['T_HAS_COURSE']): ?>
              <div id = "buy">
          <?php if ($this->_tpl_vars['T_COURSE']->course['price']): ?>
              <?php if ($this->_tpl_vars['T_HAS_COURSE']): ?>
                  <span><?php echo $this->_tpl_vars['T_COURSE']->course['price_string']; ?>
</span>
                  <img class = "ajaxHandle inactiveImage" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
" alt = "<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
" onclick = "alert('<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
')">
                 <?php else: ?>
                  <span><?php echo $this->_tpl_vars['T_COURSE']->course['price_string']; ?>
</span>
                  <img class = "ajaxHandle" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_ADDTOCART; ?>
" alt = "<?php echo @_ADDTOCART; ?>
" onclick = "addToCart(this, '<?php echo $this->_tpl_vars['T_COURSE']->course['id']; ?>
', 'course');<?php if (! $this->_tpl_vars['T_CONFIGURATION']['enable_cart']): ?>location=redirectLocation<?php endif; ?>">
                 <?php endif; ?>
          <?php else: ?>
              <?php if ($this->_tpl_vars['T_HAS_COURSE']): ?>
                  <span><?php echo $this->_tpl_vars['T_COURSE']->course['price_string']; ?>
</span>
                  <img class = "ajaxHandle inactiveImage" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
" alt = "<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
" onclick = "alert('<?php echo @_YOUALREADYHAVETHISCOURSE; ?>
')">
              <?php elseif (! $this->_tpl_vars['T_CONFIGURATION']['disable_payments']): ?>
                  <span><?php echo @_FREEOFCHARGE; ?>
</span>
                  <img class = "ajaxHandle" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_ENROLL; ?>
" alt = "<?php echo @_ENROLL; ?>
" onclick = "addToCart(this, '<?php echo $this->_tpl_vars['T_COURSE']->course['id']; ?>
', 'course');<?php if (! $this->_tpl_vars['T_CONFIGURATION']['enable_cart']): ?>location=redirectLocation<?php endif; ?>">
                 <?php else: ?>
                  <span><?php echo @_ENROLL; ?>
</span>
                  <img class = "ajaxHandle" src = "images/32x32/<?php echo $this->_tpl_vars['cart_image']; ?>
" title = "<?php echo @_ENROLL; ?>
" alt = "<?php echo @_ENROLL; ?>
" onclick = "addToCart(this, '<?php echo $this->_tpl_vars['T_COURSE']->course['id']; ?>
', 'course');<?php if (! $this->_tpl_vars['T_CONFIGURATION']['enable_cart']): ?>location=redirectLocation<?php endif; ?>">
                 <?php endif; ?>
       <?php endif; ?>
                 </div>
             <?php endif; ?>
         <?php $this->_smarty_vars['capture']['t_buy_course_code'] = ob_get_contents(); ob_end_clean(); ?>

         <?php if ($this->_tpl_vars['T_COURSE_INSTANCES'] && sizeof ( $this->_tpl_vars['T_COURSE_INSTANCES'] ) > 1): ?>
         <div class = "lessonInfo"><span class = "infoTitle">Available Instances:</span>
          <select onchange = "var val = this.options[this.options.selectedIndex].value;location = '<?php echo $_SERVER['PHP_SELF']; ?>
?'+'<?php echo $_SERVER['QUERY_STRING']; ?>
'.replace(/&courses_ID=\d*/, '&courses_ID='+val).replace(/&info_course=\d*/, '&info_course='+val);">
           <?php $_from = $this->_tpl_vars['T_COURSE_INSTANCES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['instances_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['instances_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['instances_list']['iteration']++;
?>
           <option value = "<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($_GET['courses_ID'] == $this->_tpl_vars['key'] || $_GET['info_course'] == $this->_tpl_vars['key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item']->course['name']; ?>
</option>
           <?php endforeach; endif; unset($_from); ?>
          </select>
         </div>
         <?php endif; ?>
         <?php $_from = $this->_tpl_vars['T_COURSE_INFO']->metadataArray; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['info_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['info_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['info_list']['iteration']++;
?>
          <div class = "lessonInfo"><span class = "infoTitle"><?php echo $this->_tpl_vars['T_COURSE_INFO']->metadataAttributes[$this->_tpl_vars['key']]; ?>
:</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "<br />") : smarty_modifier_replace($_tmp, "\n", "<br />")); ?>
</div>
         <?php endforeach; endif; unset($_from); ?>
      <div class = "lessonInfo"><span class = "infoTitle"><?php echo @_LANGUAGE; ?>
:</span> <?php echo $this->_tpl_vars['T_LANGUAGES'][$this->_tpl_vars['T_ADDITIONAL_COURSE_INFO']['language']]; ?>
</div>

   <?php if ($this->_tpl_vars['T_COURSE']->course['max_users']): ?>
    <div class = "lessonInfo"><span class = "infoTitle"><?php echo @_MAXIMUMUSERS; ?>
:</span>
    <?php echo $this->_tpl_vars['T_COURSE']->course['max_users']; ?>
 <?php if ($this->_tpl_vars['T_COURSE']->course['seats_remaining']): ?>(<?php echo $this->_tpl_vars['T_COURSE']->course['seats_remaining']; ?>
 <?php echo @_SEATSREMAINING; ?>
)<?php endif; ?>
    </div>
   <?php endif; ?>

   <?php if ($this->_tpl_vars['T_COURSE']->options['training_hours']): ?>
    <div class = "lessonInfo"><span class = "infoTitle"><?php echo @_TRAININGHOURS; ?>
:</span> <?php echo $this->_tpl_vars['T_COURSE']->options['training_hours']; ?>
</div>
   <?php endif; ?>
   <?php if ($this->_tpl_vars['T_COURSE']->course['start_date']): ?>
    <div class = "lessonInfo"><span class = "infoTitle"><?php echo @_COURSESTARTSAT; ?>
:</span> #filter:timestamp_time_nosec-<?php echo $this->_tpl_vars['T_COURSE']->course['start_date']; ?>
#</div>
    <div class = "lessonInfo"><span class = "infoTitle"><?php echo @_COURSEENDSAT; ?>
:</span> #filter:timestamp_time_nosec-<?php echo $this->_tpl_vars['T_COURSE']->course['end_date']; ?>
#</div>
   <?php endif; ?>
   <?php if ($this->_tpl_vars['T_COURSE']->course['location']): ?>
    <div class = "lessonInfo"><span class = "infoTitle"><?php echo @_LOCATION; ?>
:</span> <?php echo $this->_tpl_vars['T_COURSE']->course['location']; ?>
</div>
   <?php endif; ?>
         <?php if ($this->_tpl_vars['T_COURSE_LESSONS']): ?>
          <div class = "lessonInfo"><span class = "infoTitle"><?php echo @_COURSELESSONS; ?>
:</span>
          <?php $_from = $this->_tpl_vars['T_COURSE_LESSONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['course_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['course_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['lesson']):
        $this->_foreach['course_lessons_list']['iteration']++;
?>
           <a href = "<?php echo $_SERVER['PHP_SELF']; ?>
?<?php echo $_SERVER['QUERY_STRING']; ?>
#<?php echo $this->_tpl_vars['lesson']->lesson['id']; ?>
" class = "editLink"><?php echo $this->_tpl_vars['lesson']->lesson['name']; ?>
<?php if (! ($this->_foreach['course_lessons_list']['iteration'] == $this->_foreach['course_lessons_list']['total'])): ?>,<?php endif; ?></a>
          <?php endforeach; endif; unset($_from); ?>
          </div>
          <?php echo $this->_smarty_vars['capture']['t_buy_course_code']; ?>

          <?php $_from = $this->_tpl_vars['T_COURSE_LESSONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['course_lessons_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['course_lessons_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['lesson']):
        $this->_foreach['course_lessons_list']['iteration']++;
?>
          <div class = "courseLessonInfo">
           <div class = "topTitle" >
            <a href = "javascript:scroll(0,0)" name = "<?php echo $this->_tpl_vars['lesson']->lesson['id']; ?>
" ><?php echo $this->_tpl_vars['lesson']->lesson['name']; ?>
</a>
           </div>
           <?php $_from = $this->_tpl_vars['T_COURSE_LESSON_INFO'][$this->_tpl_vars['id']]->metadataArray; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['info_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['info_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['info_list']['iteration']++;
?>
            <div class = "lessonInfo"><span class = "infoTitle"><?php echo $this->_tpl_vars['T_COURSE_LESSON_INFO'][$this->_tpl_vars['id']]->metadataAttributes[$this->_tpl_vars['key']]; ?>
:</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('replace', true, $_tmp, "\n", "<br />") : smarty_modifier_replace($_tmp, "\n", "<br />")); ?>
</div>
           <?php endforeach; endif; unset($_from); ?>
            <?php $this->assign('language', $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['language']); ?>
            <?php if ($this->_tpl_vars['language']): ?><div class = "lessonInfo"><span class = "infoTitle"><?php echo @_LANGUAGE; ?>
:</span> <?php echo $this->_tpl_vars['T_LANGUAGES'][$this->_tpl_vars['language']]; ?>
</div><?php endif; ?>
          <?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['start_date']): ?>
        <div class = "lessonInfo"><span class = "infoTitle"><?php echo @_STARTDATE; ?>
:</span> #filter:timestamp_time_nosec-<?php echo $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['start_date']; ?>
#</div>
        <div class = "lessonInfo"><span class = "infoTitle"><?php echo @_ENDDATE; ?>
:</span> #filter:timestamp_time_nosec-<?php echo $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['end_date']; ?>
#</div>
       <?php endif; ?>
       <?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['professors_string']): ?><div class = "lessonInfo"><span class = "infoTitle"><?php echo @_PROFESSORS; ?>
:</span> <?php echo $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['professors_string']; ?>
</div><?php endif; ?>
       <?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['content'] || $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['tests'] || $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['projects']): ?>
             <?php echo '<div class = "lessonInfo">'; ?><?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['content']): ?><?php echo '<span class = "infoTitle">'; ?><?php echo @_UNITS; ?><?php echo ':</span> '; ?><?php echo $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['content']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['tests']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['content']): ?><?php echo ','; ?><?php endif; ?><?php echo ' <span class = "infoTitle">'; ?><?php echo @_TESTS; ?><?php echo ':</span> '; ?><?php echo $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['tests']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['projects']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['content'] || $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['tests']): ?><?php echo ','; ?><?php endif; ?><?php echo ' <span class = "infoTitle">'; ?><?php echo @_PROJECTS; ?><?php echo ':</span> '; ?><?php echo $this->_tpl_vars['T_ADDITIONAL_LESSON_INFO'][$this->_tpl_vars['id']]['projects']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</div>
      <?php endif; ?>
           <?php if ($this->_tpl_vars['T_CONTENT_TREE'][$this->_tpl_vars['id']]): ?>
            <fieldset class = "fieldsetSeparator">
                <legend><?php echo @_LESSONCONTENT; ?>
</legend>
                <?php echo $this->_tpl_vars['T_CONTENT_TREE'][$this->_tpl_vars['id']]; ?>

            </fieldset>
           <?php endif; ?>
          </div>
          <?php endforeach; endif; unset($_from); ?>
         <?php endif; ?>

   <?php echo $this->_smarty_vars['capture']['t_buy_course_code']; ?>

 <?php endif; ?>