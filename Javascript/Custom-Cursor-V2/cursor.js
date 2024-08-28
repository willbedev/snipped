/*  -----------------------------------------------------------------------------------------------
  cusrom custom
--------------------------------------------------------------------------------------------------- */

let outline = document.querySelector('.outline');
let cursor = document.querySelector('.cursor');
let rollimage = document.querySelectorAll('p, h1, h2, h3, section, input'); // stesso esempio sopra con classe
let rollaccordion = document.querySelectorAll('button'); // per gli accordion

document.addEventListener('mousemove',(e) => {
	gsap.to(
		cursor, {
			duration: 0.5,
			x: e.clientX,
			y: e.clientY,
			ease: "power1.out",
			overwrite: "auto",
		}
	);

	gsap.to(
		outline, {
			duration: 0.5,
			x: e.clientX,
			y: e.clientY,
			ease: "power1.out",
			overwrite: "auto",
		}
	);
});

rollimage.forEach((item) => { //impostata la variabile a
	item.addEventListener('mouseover', () => {
		outline.classList.add('hover'); // aggiunge la classe hover 
		cursor.classList.add('hover');
	});
	item.addEventListener('mouseleave', () => {
		outline.classList.remove('hover');  // toglie la classe hover 
		cursor.classList.remove('hover');
	});
});

/** per gli accordion con cursore + **/
rollaccordion.forEach((item) => { //impostata la variabile a
	item.addEventListener('mouseover', () => {
		outline.classList.add('hover-accord'); // aggiunge la classe hover 
		cursor.classList.add('hover-accord');
	});
	item.addEventListener('mouseleave', () => {
		outline.classList.remove('hover-accord');  // toglie la classe hover 
		cursor.classList.remove('hover-accord');
	});
});