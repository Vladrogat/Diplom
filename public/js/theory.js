function clickAcordeon(obj) {
	let accordions = document.querySelectorAll(".accordion-body");
	let doc = document.querySelector(".doc-word");

	accordions.forEach(accordion => {
		accordion.classList.remove("active");
	})
	doc.src = "https://drive.google.com/file/d/" + obj.id + "/preview";
	obj.classList.add("active");
}
function clickSentens(obj) {
	let accordions = document.querySelectorAll(".accordion-body");
	let doc = document.querySelector(".doc-word");

	accordions.forEach(accordion => {
		accordion.classList.remove("active");
	})

	let protocol = window.location.protocol;
	let port = window.location.port;
	let host = window.location.hostname;

	doc.src = protocol + "//" + host + ":" + port + "/html/" + obj.id;
	obj.classList.add("active");
}

