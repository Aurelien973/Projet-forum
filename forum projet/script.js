const LoginRegister = document.querySelector('.LoginRegister');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPop = document.querySelector('.btnLogin-pop');
const BackRe = document.querySelector('.icon-close');

const AjoutTopic = document.querySelector('.AjoutTopic');
const btnTopic = document.querySelector('.btnTopic-pop');
const RebtnTopicPop = document.querySelector('.icon-close2');



registerLink.addEventListener('click', ()=> { LoginRegister.classList.add('active');
});

loginLink.addEventListener('click', ()=> { LoginRegister.classList.remove('active');
});

btnPop.addEventListener('click', ()=> { LoginRegister.classList.add('active-popup');
});

BackRe.addEventListener('click', ()=> { LoginRegister.classList.remove('active-popup');
});

btnTopic.onclick = () => { 
    AjoutTopic.classList.add('active-topic');
};

RebtnTopicPop.onclick = () => { 
    AjoutTopic.classList.remove('active-topic');
};

