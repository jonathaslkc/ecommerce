/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

document.getElementById('btnFake').addEventListener('click', function(){
         document.getElementById('fileUpload').click();
      });
 
      function saveImages()
      {
         $('#formImage').ajaxSubmit({
            url  : '../controller/uploadAjax.control.php',
            type : 'POST'
         });
      }