{capture name = "moduleNewsPage"}
 <tr><td class = "moduleCell">
 {if !$_student_ && ($smarty.get.add || $smarty.get.edit)}
     {capture name = 't_add_code'}
   {eF_template_printForm form = $T_ENTITY_FORM_ARRAY}
{*
   {$T_ENTITY_FORM.javascript}
   <form {$T_ENTITY_FORM.attributes}>
       {$T_ENTITY_FORM.hidden}
       <table class = "formElements">
           <tr><td class = "labelCell">{$T_ENTITY_FORM.title.label}:&nbsp;</td>
               <td class = "elementCell">{$T_ENTITY_FORM.title.html}</td></tr>
           <tr><td class = "labelCell">{$T_ENTITY_FORM.data.label}:&nbsp;</td>
               <td class = "elementCell">
                <div>
                 <img onclick = "toggleEditor('data','simpleEditor');" class = "handle" src = "images/16x16/order.png" title = "{$smarty.const._TOGGLEHTMLEDITORMODE}" alt = "{$smarty.const._TOGGLEHTMLEDITORMODE}" />&nbsp;
        <a href = "javascript:toggleEditor('data','simpleEditor');" id = "toggleeditor_link">{$smarty.const._TOGGLEHTMLEDITORMODE}</a>
       </div>
       {$T_ENTITY_FORM.data.html}</td></tr>
           <tr><td class = "labelCell">{$smarty.const._FROM}:&nbsp;</td>
               <td class = "elementCell">{eF_template_html_select_date prefix="from_" time=$T_FROM_TIMESTAMP start_year="-1" end_year="+5" field_order = $T_DATE_FORMATGENERAL} {$smarty.const._TIME}: {html_select_time prefix="from_" time = $T_FROM_TIMESTAMP display_seconds = false}</td></tr>
           <tr><td class = "labelCell">{$smarty.const._TO}:&nbsp;</td>
               <td class = "elementCell">{eF_template_html_select_date prefix="to_" time=$T_TO_TIMESTAMP start_year="-1" end_year="+5" field_order = $T_DATE_FORMATGENERAL} {$smarty.const._TIME}: {html_select_time prefix="to_" time = $T_TO_TIMESTAMP display_seconds = false}</td></tr>
           <tr><td class = "labelCell">{$smarty.const._DISPLAYONCALENDAR}:&nbsp;</td>
               <td class = "elementCell">{eF_template_html_select_date prefix="calendar_" time=$T_CALENDAR_TIMESTAMP start_year="-1" end_year="+5" field_order = $T_DATE_FORMATGENERAL} {$smarty.const._TIME}: {html_select_time prefix="to_" time = $T_TO_TIMESTAMP display_seconds = false}</td></tr>
     <tr><td class = "labelCell">{$smarty.const._SENDASEMAILALSO}:&nbsp;</td>
                        <td class = "elementCell">{$T_ENTITY_FORM.email.html}</td></tr>
           <tr><td></td>
               <td class = "submitCell">{$T_ENTITY_FORM.submit.html}</td></tr>
       </table>
   </form>
*}
  {if $T_MESSAGE_TYPE == 'success'}
     <script>parent.location = parent.location;</script>
  {/if}
  {/capture}

  {eF_template_printBlock title = $smarty.const._ANNOUNCEMENT data = $smarty.capture.t_add_code image = '32x32/announcements.png' help ='Announcements'}
 {elseif $smarty.get.view}
  {if $T_NEWS.data == ""}
   {assign var= "news_data" value=$smarty.const._NODATAFOUND}
  {else}
   {assign var= "news_data" value=$T_NEWS.data}
  {/if}
  {eF_template_printBlock title = $T_NEWS.title data = $news_data image = '32x32/announcements.png' help ='Announcements'}
 {else}
     {capture name = "t_news_code"}
         {if !$_student_ && $_change_}
             <div class = "headerTools">
                 <img src = "images/16x16/add.png" title = "{$smarty.const._ANNOUNCEMENTADD}" alt = "{$smarty.const._ANNOUNCEMENTADD}"/>
                 <a href = "{$smarty.server.PHP_SELF}?ctg=news&add=1&popup=1" onclick = "eF_js_showDivPopup('{$smarty.const._ANNOUNCEMENTADD}', 2)" title = "{$smarty.const._ANNOUNCEMENTADD}" target = "POPUP_FRAME">{$smarty.const._ANNOUNCEMENTADD}</a>
             </div>
         {/if}
      <table class = "sortedTable" width = "100%">
          <tr class = "defaultRowHeight">
              <td class = "topTitle">{$smarty.const._TITLE}</td>
              <td class = "topTitle">{$smarty.const._BODY}</td>
              <td class = "topTitle">{$smarty.const._DATE}</td>
              <td class = "topTitle">{$smarty.const._USERCAPITAL}</td>
      {if !$_student_ && $_change_}
              <td class = "topTitle centerAlign noSort">{$smarty.const._FUNCTIONS}</td></tr>
      {/if}
      {foreach name = 'news_list' item = "item" key = "key" from = $T_NEWS}
          <tr class = "defaultRowHeight {cycle values = "oddRowColor,evenRowColor"}">
              <td>{$item.title}</td>
              <td>{$item.data}</td>
              <td><span style = "display:none">{$item.timestamp}</span>#filter:timestamp_time-{$item.timestamp}#</td>
              <td>#filter:user_login-{$item.users_LOGIN}#</td>
          {if $smarty.session.s_type != 'student' && $_change_}
              <td class = "centerAlign">
               {if $T_CURRENT_USER->user.login == $item.users_LOGIN || $T_CURRENT_USER->user.user_type == 'administrator'}
                   <a href = "{$smarty.server.PHP_SELF}?ctg=news&edit={$item.id}&popup=1" target = "POPUP_FRAME" onClick = "eF_js_showDivPopup('{$smarty.const._EDITANNOUNCEMENT}', 2);"><img src = "images/16x16/edit.png" alt = "{$smarty.const._EDIT}" title = "{$smarty.const._EDIT}" border = "0"/></a>&nbsp;
                   <img class = "ajaxHandle" src = "images/16x16/error_delete.png" alt = "{$smarty.const._DELETE}" title = "{$smarty.const._DELETE}" onclick = "if (confirm('{$smarty.const._IRREVERSIBLEACTIONAREYOUSURE}')) deleteEntity(this, '{$item.id}');"/>
                  {/if}
              </td>
          {/if}
              </tr>
      {foreachelse}
          <tr class = "defaultRowHeight oddRowColor"><td colspan = "100%" class = "emptyCategory">{$smarty.const._NODATAFOUND}</td></tr>
      {/foreach}
      </table>
     {/capture}

     {eF_template_printBlock title = $smarty.const._ANNOUNCEMENTS data = $smarty.capture.t_news_code image = '32x32/announcements.png' help = 'Announcements'}
 {/if}
 </td></tr>
{/capture}
