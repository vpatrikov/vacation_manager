function visible(checkBox_Name, inp_field) {
    var checkBox = document.getElementById(checkBox_Name);
    var text = document.getElementById(inp_field);
  
    if (checkBox.checked == true){
      text.style.textAlign = "center";
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  } 