console.log('script loaded');

const tablebody = document.getElementById('table-body');

function showUsers() {
	tablebody.innerHTML = "";
	xhr = new XMLHttpRequest();
	xhr.open("GET", "./phpStuff/read.php", true);
	xhr.responseType = "json";
	xhr.onload = () => {
		if (xhr.status === 200) {
			if (xhr.response) {
				x = xhr.response;
			}
			else{
				x = "";
			}

			for (var i=0; i<x.length; i++) {
				tablebody.innerHTML += "<tr><td>" + x[i].id + "</td><td>" + x[i].name + "</td><td>" + x[i].email + "</td><td><button class='edit-btns btn btn-warning text-white mr-2' userid="+ x[i].id +">Edit</button><button class='del-btn btn btn-danger' userid="+ x[i].id +">Delete</button></td></tr>";
			}
		}
		else {
			console.log('failed to read');
		}

		deleteUser();
		editUser();
	}

	xhr.send();
}
showUsers();




document.getElementById('saveBtn').addEventListener('click', save);

	function save(e) {
		e.preventDefault();
		console.log('clicked');

		var uid = document.getElementById('uid').value;
		var name = document.getElementById('name').value;
		var password = document.getElementById('password').value;
		var email = document.getElementById('email').value;
		

		const xhr = new XMLHttpRequest();
		xhr.open("POST", "./phpStuff/insert.php", true);
		xhr.setRequestHeader("Content-Type", "application/json");

		xhr.onload = () => {
			if (xhr.status === 200) {
				document.getElementById('msg').innerHTML = "<div class='alert alert-warning'>" + xhr.responseText + "</div>";
				document.getElementById('crud-form').reset();
				showUsers();
			}
			else{
				console.log('not worked');
			}
		}

		const data = {id: uid,name: name, email: email, password: password};
		const dataJSON = JSON.stringify(data);
		xhr.send(dataJSON);
	}



function deleteUser() {
	var del = document.getElementsByClassName('del-btn');
	
	for(let i=0; i<del.length; i++){
		del[i].addEventListener('click', function () {
			id = del[i].getAttribute("userid");
			const xhr = new XMLHttpRequest();
			xhr.open("POST", "./phpStuff/delete.php", true);
			xhr.setRequestHeader ("Content-Type","application/json");

			xhr.onload = () => {
				if (xhr.status === 200) {
					document.getElementById('msg').innerHTML = "<div class='alert alert-warning'>" + xhr.responseText + "</div>";
					showUsers();
				}
				else{
					console.log('not deleted');
				}
			}
			const rawdeldata = { uid:id };
			const deldata = JSON.stringify(rawdeldata);
			xhr.send(deldata);
		});
	}
}


function editUser() {
	let edit = document.getElementsByClassName("edit-btns");
	
	var uid = document.getElementById('uid');
	var name = document.getElementById('name');
	var email = document.getElementById('email');
	var password = document.getElementById('password');
	
	
	for(let i=0; i<edit.length; i++){
		edit[i].addEventListener('click', function () {
			id = edit[i].getAttribute("userid");
			const xhr = new XMLHttpRequest();
			xhr.open("POST", "./phpStuff/edit.php", true);
			xhr.responseType = "json";
			xhr.setRequestHeader ("Content-Type","application/json");

			xhr.onload = () => {
				if (xhr.status === 200) {
					
					var user = xhr.response;

					uid.value = user.id;
					name.value = user.name;
					email.value = user.email;
					password.value = user.password;

				}
				else{
					console.log('not deleted');
				}
			}
			const raweditdata = { uid:id };
			const editdata = JSON.stringify(raweditdata);
			xhr.send(editdata);
		});
	}

}

