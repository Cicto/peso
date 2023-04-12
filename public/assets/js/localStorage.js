let pathname = window.location.pathname.split( '/' );
let url = window.location.origin+'/'+pathname[1]+'/'+pathname[2]+'/'+pathname[3];

const response = fetch(url+'/home/localStorage', {})
.then(response => response.json)
.then(data => console.log('success:', data));