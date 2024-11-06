const CONTAINER_A = document.querySelector('.container-a')
const CONTAINER_B = document.querySelector('.container-b')
const BTN_A = document.querySelector('.btn-a')
const BTN_B = document.querySelector('.btn-b')

BTN_A.addEventListener('click', ()=>{
    CONTAINER_A.classList.toggle('active')
   
})

BTN_B.addEventListener('click', ()=>{
    CONTAINER_B.classList.toggle('active')
})

document.querySelector('.form').addEventListener('submit', async function (e)
{
    window.location.href = "/reg";
})