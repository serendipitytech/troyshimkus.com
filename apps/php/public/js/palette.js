// Hydrate CSS variables from localStorage.palette
(function(){
  try{
    const raw = localStorage.getItem('palette');
    if(!raw) return;
    const p = JSON.parse(raw);
    Object.entries(p).forEach(([k,v])=>document.documentElement.style.setProperty(`--${k}`, v));
  }catch(e){}
})();

