
   //tutorial https://www.youtube.com/watch?v=tMFhuYt_cw8&t=1288s
   
   // elements, aggiunge la classe in-page a tutti gli elementi con classe whatch
   var elements_to_watch = document.querySelectorAll('.watch');

   // callback 
   var callback = function(items){
     items.forEach((item) => {
       if(item.isIntersecting){
         item.target.classList.add("in-page");
       } else{
         item.target.classList.remove("in-page");
       }
     });
   }

   // observer
   var observer = new IntersectionObserver(callback, { threshold: 0.6 } );
   // threshold % della section nello schermo in questo caso 0,6 significa 60% nel vieport

   // apply
   elements_to_watch.forEach((element) => {
     observer.observe(element); 
   });
   
   
   
