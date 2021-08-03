
// Check Valid input form
function checkVallidate(){
    message = "Please input your ";
    message2 = "Please input number ";
    message3 = "Your comment is so long (just 60 words)";
    message4 = "Please upload you image";
    if(!checkText('name')){
        alert(message+'name');return false;
    }else if(!checkText('age')){
        alert(message+'age');return false;
    }else if(!checkNumber('age')){
        alert(message2+'age');return false;
    }    else if(!checkText('address')){
        alert(message+'address');return false;
    }else if(!checkText('text_file')){
        alert(message4);return false;
    }else if(!checkText('comment')){
        alert(message+'comment');return false;
    }else if(!checkLength('comment')){
        alert(message3);return false;
    }
    return true;

}

function checkLength(name){
    tag = $("#"+name);
    if(countWords(tag.val())>60){
        return false;
    }
    return true;

}

function countWords(s){
    s = s.replace(/(^\s*)|(\s*$)/gi,"");//exclude  start and end white-space
    s = s.replace(/[ ]{2,}/gi," ");//2 or more space to 1
    s = s.replace(/\n /,"\n"); // exclude newline with a start spacing
    return s.split(' ').length;
}

function checkText(name){
    tag = $("#"+name);
    if(tag.val()==""){
        return false;
    }
    return true;
}

function checkNumber(name){
    tag = $("#"+name);
    if(isNaN(tag.val())){
        return false;
    }
    return true;
}

$("#button").bind('click', function(event) {

    if(checkVallidate()==false){
        event.preventDefault();
    }

});