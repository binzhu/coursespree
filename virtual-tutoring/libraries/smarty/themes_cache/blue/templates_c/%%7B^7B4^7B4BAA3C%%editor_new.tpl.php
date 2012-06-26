<?php /* Smarty version 2.6.26, created on 2012-05-15 12:00:18
         compiled from includes/editor_new.tpl */ ?>
 <script type = "text/javascript" src = "editor/tiny_mce_new/tiny_mce_gzip.js"></script>
     <?php echo '

        <script type = "text/javascript">
        <!--
            tinyMCE_GZ.init({
                mode : "specific_textareas",
                editor_selector : "mceEditor,templateEditor,simpleEditor,digestEditor",
                plugins : \'tooltip,spellchecker,iframe,Jsvk,java,asciimath,asciisvg,table,style,save,advhr,advimage,advlink,emotions,iespell,preview,zoom,searchreplace,print,contextmenu,media,paste,directionality,fullscreen,index_link\',
                themes : \'simple,advanced\',
                languages : \''; ?>
<?php echo @_CURRENTLANGUAGESYMBOL; ?>
<?php echo '\', //theoritically, here must be all suported languages but tinymce reads only the last one (possibly a bug). So we load only the session language(makriria 2207/07/30)
                disk_cache : true, // it was false... check lang issue
                debug : false,
                events : "onClick",
                handle_event_callback : "myHandleEvent"
        });
        // -->

        </script>
 '; ?>

 <script type="text/javascript" src="editor/tiny_mce_new/plugins/asciimath/js/ASCIIMathMLwFallback.js"></script>
 <script type="text/javascript" src="editor/tiny_mce_new/plugins/asciisvg/js/ASCIIsvgPI.js"></script>
 <?php echo '
 <script type="text/javascript">
  var AScgiloc = \'editor/tiny_mce_new/php/svgimg.php\';
  var AMTcgiloc = \''; ?>
<?php echo $this->_tpl_vars['T_CONFIGURATION']['math_server']; ?>
<?php echo '\';
 </script>
 '; ?>

 <script type = "text/javascript" src = "editor/tiny_mce_new/efront_init_tiny_mce.php"></script>