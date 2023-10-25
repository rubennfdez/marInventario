let preveiwContainer = document.querySelector('.categoria-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');

document.querySelectorAll('.categoria-container .categoria').forEach(categoria =>{
  categoria.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = categoria.getAttribute('data-name');
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