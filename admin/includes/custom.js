/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){        
    
    //to auto close message box with id=alert
        $("#alert").fadeTo(4000, 500).slideUp(500, function () {
            $("#alert").alert('close');
        });
});


