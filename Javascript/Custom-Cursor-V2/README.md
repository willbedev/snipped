# Cursor JS
***
Questa cartella contine il CSS e JS per il cursore personalizzato. In particolare questa versione risolve il problema del rendering sui browser con particolare riferimento ai browser Safari che hanno difficoltà a rendirizzare gli effetti di transizione.

Per funzionare è necessario caricare in function la libreria GSAP
wp_enqueue_script( 'gsap-latest-beta', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );

Rispetto alla versione precedente infatti è presente l'uso di gsap all'interno dell'EventListener mousemove

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

è grazie infatti a gsap che il calcolo della posizione viene effettuato con precisione ed evita ritardi consentendo allo stesso tempo di usare la proprietà transition all'interno del css per effetti di transazione da cerchio a croce, come nel caso del progetto pairon



