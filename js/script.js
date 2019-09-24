function validateEmail(email) 
{
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function check(event)
{
	event.preventDefault();
	let first_name = document.getElementById("first-name");
	let second_name = document.getElementById("second-name");
	let email = document.getElementById("email");
	
	if(first_name.value === '' ||  second_name.value === '' || email.value === '') {
		alert("Все поля должны быть заполнены.");
	} else if (!validateEmail(email.value)) {
		alert("Некорректный email!");
	} else {
		window.location.href = "crud.php?first_name="+first_name.value+"&second_name="+second_name.value+"&email="+email.value+"&save=yes";
	}	
}