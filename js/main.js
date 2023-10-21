const profile = document.getElementById("profile");

document.querySelector('.header nav .profile-avatar').addEventListener("click",()=>{
  if(profile.getAttribute("data")=="visible"){
    profile.style.right="-100%";
    profile.setAttribute("data",'invisible')
  }else{
    profile.style.right="0px";
    profile.setAttribute("data",'visible')
  }
});
document.querySelector('.right-hamburger .profile-avatar').addEventListener("click",()=>{
  if(profile.getAttribute("data")=="visible"){
    profile.style.right="-100%";
    profile.setAttribute("data",'invisible')
  }else{
    profile.style.right="0px";
    profile.setAttribute("data",'visible')
  }
});

document.querySelector('#profile .cancel').addEventListener("click",()=>{
    profile.style.right="-100%";
    profile.setAttribute("data",'invisible')
})


const humburger = document.querySelector('.right-hamburger');
document.querySelector('.hum-action').addEventListener('click',()=>{
  humburger.style.right="0px";
});
document.querySelector('.right-hamburger span.cancel').addEventListener('click',()=>{
  humburger.style.right="-100%";
});