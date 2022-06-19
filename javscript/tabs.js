let tabs = document.querySelectorAll('.toggle-btn'),
contents = document.querySelectorAll('.admin-container');

tabs.forEach((tab, index)=> {
    tab.addEventListener('click', () => {
        contents.forEach((content) => {
            content.classList.remove('is-active');
        });
        tabs.forEach((tab) => {
            tab.classList.remove('is-active');
        });
        contents[index].classList.add('is-active');
        tabs[index].classList.add('is-active');
    });
});

let membertabs= document.querySelectorAll('.toggle-member'),
members = document.querySelectorAll('.member-details');

membertabs.forEach((membertab, index)=> {
    membertab.addEventListener('click', () => {
        members.forEach((member) => {
            member.classList.remove('is-active');
        });
        membertabs.forEach((membertab) => {
            membertab.classList.remove('is-active');
        });
        members[index].classList.add('is-active');
        membertabs[index].classList.add('is-active');
    });
});