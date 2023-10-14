const profile = document.getElementById("profile");

document.querySelector('.profile-avatar').addEventListener("click",()=>{
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