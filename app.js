 
 function showHide(elem) {
     console.log(elem.value);
     if(elem.value == 'ทำงานแล้ว') {
         document.getElementById('div2').style.display = 'inline';
        document.getElementById('div1').style.display = 'none';
        document.getElementById('div3').style.display = 'none';
     }else if(  elem.value == 'ยังไม่ได้ทำงาน'  ){
         document.getElementById('div2').style.display = 'none';
        document.getElementById('div1').style.display = 'inline';
        document.getElementById('div3').style.display = 'none';
     }else if(  elem.value == 'กำลังศึกษาต่อ'  ){
         document.getElementById('div2').style.display = 'none';
        document.getElementById('div1').style.display = 'none';
        document.getElementById('div3').style.display = 'inline';
     }else{
        document.getElementById('div2').style.display = 'none';
        document.getElementById('div1').style.display = 'none';
        document.getElementById('div3').style.display = 'none';
     }
 } 


 
 function showwork_type(elem) {
     console.log(elem.value);
     if(elem.value == 'อื่น ๆ') {
         document.getElementById('work_type').style.display = 'inline';
     }else{
        document.getElementById('work_type').style.display = 'none';
     }
 }
 
 function showwork_skill(elem) {
     console.log(elem.value);
     if(elem.value == 'อื่น ๆ') {
         document.getElementById('work_skill').style.display = 'inline';
     }else{
        document.getElementById('work_skill').style.display = 'none';
     }
 }
 
 function showwork_uncomplace(elem) {
     console.log(elem.value);
     if(elem.value == 'อื่น ๆ') {
         document.getElementById('work_uncomplace').style.display = 'inline';
     }else{
        document.getElementById('work_uncomplace').style.display = 'none';
     }
 }
 
 function showfree_cause(elem) {
     console.log(elem.value);
     if(elem.value == 'อื่น ๆ') {
         document.getElementById('free_cause').style.display = 'inline';
     }else{
        document.getElementById('free_cause').style.display = 'none';
     }
 }
 
 function showfree_issue(elem) {
     console.log(elem.value);
     if(elem.value == 'อื่น ๆ') {
         document.getElementById('free_issue').style.display = 'inline';
     }else{
        document.getElementById('free_issue').style.display = 'none';
     }
 }
 
 function showfree_important(elem) {
     console.log(elem.value);
     if(elem.value == 'อื่น ๆ') {
         document.getElementById('free_important').style.display = 'inline';
     }else{
        document.getElementById('free_important').style.display = 'none';
     }
 }



  
 window.onload=function() {
    document.getElementById("frmMyform").getElementsByTagName('div');
 }
