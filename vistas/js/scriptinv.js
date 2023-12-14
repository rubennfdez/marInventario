let preveiwContainer = document.querySelector('.inventario-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');

document.querySelectorAll('.inventario-container .inventario').forEach(inventario =>{
  inventario.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = inventario.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };
});

previewBox.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
  };
});