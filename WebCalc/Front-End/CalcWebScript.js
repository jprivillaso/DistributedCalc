/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var classController = function() {

};

classController.prototype = {
        
    bindEvents: function(){
        $('#calculateButton').on('click', function(){
            instanceController.calculate();
        });
    },   
    
    calculate: function(){
        
        var action = $('#actionSelect').val();
        var number1 = $('#number1').val();
        var number2 = $('#number2').val();
        
        var params = {
            'action' : action,
            'number1' : number1,
            'number2' : number2
        };
        
        instanceController.callService(params, '../Back-End/Services/WSController.php');
    },
            
    callService: function(params, url){
        $.ajax({
            data: params,
            datatype: "json",
            type: "POST",
            url: url,
            success: function(json){
                $('#result').html('<p>' + json + '</p>');
            }
        });
    },        
    
    _main: function(){
        instanceController.bindEvents();
    }
};

$(document).ready(function(){
    _mainController();
});

var instanceController = null;

function _mainController() {
    instanceController = new classController();
    instanceController._main();
}