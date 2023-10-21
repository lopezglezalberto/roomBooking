/**
 * Created by informatica on 16/09/2020.
 */

CKEDITOR.plugins.add('agregar_acuerdo', {

    init: function(editor) {

       editor.addCommand("mySimpleCommand", {
           exec: function(edt) {
               alert(edt.getData());
           }
       });

       editor.ui.addButton('SuperButton', {
           label: "Agregar Acuerdo",
           command: 'mySimpleCommand',
           toolbar: 'insert',
           icon: this.path + 'icons/agregar.png'
       });
   }
});
