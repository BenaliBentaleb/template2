String inputs = "";
String tables ="appartement";
String sql = "SELECT " + inputs + "FROM " + tables + "WHERE ";

Boolean firstAttrAdded = false;
if(isset($_POST['name'])){
    inputs = inputs + "name";
    firstAttrAdded = true;
}

if(isset($_POST['prix'])){
    if(firstAttrAdded){
        inputs = inputs + "prix";
    }
    
}


if(isset($_POST['date'])){
    inputs = inputs + "date";
}
