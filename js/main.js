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

const choose = document.querySelector(".home .sidebar li.choose");
const cats = document.querySelector(".home .sidebar .cats");
choose.addEventListener('click',()=>{
  if(choose.getAttribute('data')=='narrowed'){
    choose.setAttribute('data','expanded');
    cats.style.display="block";
  }else{
    choose.setAttribute('data','narrowed');
    cats.style.display="none";
  }
});

const latest = document.querySelector(".home .sidebar li.latest");
const latestposts = document.querySelector(".home .sidebar .latest-posts");
latest.addEventListener('click',()=>{
  if(latest.getAttribute('data')=='narrowed'){
    latest.setAttribute('data','expanded');
    latestposts.style.display="block";
  }else{
    latest.setAttribute('data','narrowed');
    latestposts.style.display="none";
  }
});

const create = document.querySelector(".home .sidebar li.create");
const createPost = document.querySelector(".home .sidebar .createPost");
create.addEventListener('click',()=>{
  if(create.getAttribute('data')=='narrowed'){
    create.setAttribute('data','expanded');
    createPost.style.display="block";
  }else{
    create.setAttribute('data','narrowed');
    createPost.style.display="none";
  }
});