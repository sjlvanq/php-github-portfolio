let currentLoadToken = null;

function getReadme(repoName) {
	const readmeModal = document.getElementById("readmeModal");
	const loader = document.getElementById("loadingIndicator");
	const iframe = document.getElementById("readmeBox");
	
	const loadToken = Symbol();
	currentLoadToken = loadToken;
	
	readmeModal.classList.remove("hidden");
	loader.classList.remove("hidden");
	document.body.classList.add('no-scroll');
		
	iframe.onload = function () {
		if (currentLoadToken !== loadToken) return;
		loader.classList.add("hidden");
		iframe.classList.remove("hidden");
	};
	
	iframe.src = 'readme?repo=' + repoName;
}

function closeModal() {
	const readmeModal = document.getElementById("readmeModal");
	const iframe = document.getElementById("readmeBox");
	const loader = document.getElementById("loadingIndicator");
	readmeModal.classList.add("hidden");
	iframe.classList.add("hidden");
	loader.classList.remove("hidden");
	document.body.classList.remove('no-scroll');
	currentLoadToken = null;
}
