const profile = document.getElementById("profile");
const profileAvatar = document.querySelector('.header nav .profile-avatar');
if(profileAvatar != null){
profileAvatar.addEventListener("click",()=>{
  if(profile.getAttribute("data")=="visible"){
    profile.style.right="-100%";
    profile.style.display="none";
    profile.setAttribute("data",'invisible')
  }else{
    profile.style.display="flex";
    profile.style.right="0px";
    profile.setAttribute("data",'visible')
  }
});
}
const humAvatar = document.querySelector('.right-hamburger .profile-avatar');

if(humAvatar !=null){
humAvatar.addEventListener("click",()=>{
  if(profile.getAttribute("data")=="visible"){
    profile.style.right="-100%";
    profile.style.display="none";
    profile.setAttribute("data",'invisible')
  }else{
    profile.style.display="flex";
    profile.style.right="0px";
    profile.setAttribute("data",'visible')
  }
});
}
document.querySelector('#profile .cancel').addEventListener("click",()=>{
    profile.style.right="-100%";
    profile.style.display="none";
    profile.setAttribute("data",'invisible')
})


const humburger = document.querySelector('.right-hamburger');
document.querySelector('.hum-action').addEventListener('click',()=>{
  humburger.style.display="block";
  humburger.style.right="0px";
});
document.querySelector('.right-hamburger span.cancel').addEventListener('click',()=>{
  humburger.style.right="-100%";
  humburger.style.display="none";
});