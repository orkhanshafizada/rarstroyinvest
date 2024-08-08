CKEDITOR.plugins.add( 'statictexts',
{   
//   requires : ['richcombo'], //, 'styles' ],
   init : function( editor )
   {
      var config = editor.config,
         lang = editor.lang.format;

      // Gets the list of tags from the settings.
      var tags = []; //new Array();
      //this.add('value', 'drop_text', 'drop_label');
      tags[0]=[" %firstname% ", "First Name", "First Name"];
      tags[1]=[" %lastname% ", "Last Name", "Last Name"];
	  tags[2]=[" <a href=%webview%>webview</a> ", "WebView", "WebView"];
      tags[3]=[" <a href=%unsubscribe_az%>Unsubscribe AZ</a> ", "Unsubscribe AZ", "Unsubscribe AZ"];
	  tags[4]=[" <a href=%unsubscribe_en%>Unsubscribe EN</a> ", "Unsubscribe EN", "Unsubscribe EN"];
	  tags[5]=[" <a href=%unsubscribe_ru%>Unsubscribe RU</a> ", "Unsubscribe RU", "Unsubscribe RU"];
      
      // Create style objects for all defined styles.

      editor.ui.addRichCombo( 'statictexts',
         {
            label : "Insert statictexts",
            title :"Insert statictexts",
            voiceLabel : "Insert statictexts",
            className : 'cke_format',
            multiSelect : false,

            panel :
            {
               css : [ config.contentsCss, CKEDITOR.getUrl( editor.skinPath + 'editor.css' ) ],
               voiceLabel : lang.panelVoiceLabel
            },

            init : function()
            {
               this.startGroup( "statictexts" );
               //this.add('value', 'drop_text', 'drop_label');
               for (var this_tag in tags){
                  this.add(tags[this_tag][0], tags[this_tag][1], tags[this_tag][2], tags[this_tag][3], tags[this_tag][4], tags[this_tag][5]);
               }
            },

            onClick : function( value )
            {         
               editor.focus();
               editor.fire( 'saveSnapshot' );
               editor.insertHtml(value);
               editor.fire( 'saveSnapshot' );
            }
         });
   }
});