
function daftar(args)
{
    sessionStorage.setItem('daftar', args.href)
    var keys = Object.keys(sessionStorage)
    for (let each of keys)
    console.log(`${each} : ${sessionStorage.getItem(each)}`)
    // console.log(args.href)
}