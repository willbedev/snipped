/*  -----------------------------------------------------------------------------------------------
  cusrom custom
--------------------------------------------------------------------------------------------------- */

let outline = document.querySelector('.outline');
let cursor = document.querySelector('.cursor');
// let a = document.querySelectorAll('a');

document.addEventListener('mousemove', function(e){  
    // viene creata variabile X
    let x = e.clientX;   // traccia moouse sul movimento della x del mouse 
    let y = e.clientY;   // traccia moouse sul movimento della y del mouse 
   
   outline.style.transform = `translate( calc(${x}px - 50%), calc(${y}px - 50%) )`;  // sovrascrive lo stile css
   cursor.style.transform = `translate( calc(${x}px - 50%) , calc(${y}px - 50%) )`;
});