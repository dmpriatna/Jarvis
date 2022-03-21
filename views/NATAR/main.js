
function daftar(args)
{
    location.assign('#s4-2')
    // sessionStorage.setItem('daftar', args.value)
    // var keys = Object.keys(sessionStorage)
    // for (let each of keys)
    // console.log(`${each} : ${sessionStorage.getItem(each)}`)
}

function save(args)
{
    let loader = document.querySelector('.preloader')
    loader.style.display = 'inherit'
    let form = document.querySelector('.form-daftar')
    let name = form.querySelector('[name=nama]')
    let email = form.querySelector('[name=email]')
    let phone = form.querySelector('[name=telepon]')
    let dBody = new FormData()
    dBody.append('name', name.value)
    dBody.append('email', email.value)
    dBody.append('phone', phone.value)
    fetch('/api/saveUser', {
        body: dBody,
        method: 'POST'
    })
    .then(r => {
        if (r.ok)
        location.assign('#s4-3')
    })
    .catch(e => console.log(e))
    .finally(() => { loader.style.display = 'none' })
}
