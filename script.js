let question = document.getElementById('question');
let textHint = document.getElementById('txtHint');
question.addEventListener("keyup", event => {
  ajax();
});
function ajax() {
  let str = question.value;
  console.log(str); //debug
  if (str == "") {
    txtHint.innerHTML = "";
    return;
  }
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      txtHint.innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "getdata.php?q="+str,true);
  xmlhttp.send();
}
function clear() {
}
