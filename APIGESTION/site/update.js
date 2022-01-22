var invocation = new XMLHttpRequest();
const url = 'http://localhost/TestPerso1/APIGESTION/property/update/';

const myForm = document.getElementById('myForm');

let owner = document.getElementById('owner');
let tel = document.getElementById('tel');
let locations = document.getElementById('location');
let area = document.getElementById('area');
let details = document.getElementById('details');
let price = document.getElementById('price');
let ids = document.getElementById('id');


id=localStorage.getItem("identifiant")
fetch('http://localhost/TestPerso1/APIGESTION/property/update/'+id+'/')
    .then( response => response.json()).then(data=>{
        if (data.ok=true) {
            owner.value = data.results.owner
            tel.value = data.results.tel
            locations.value = data.results.location
            area.value = data.results.area
            details.value = data.results.details
            price.value = data.results.price
            ids.value = data.results.id
        }
})

myForm.addEventListener('submit', function(e){
    
        e.preventDefault();
        
        const formData = new FormData()
        formData.append('owner', owner.value)
        formData.append('tel', tel.value)
        formData.append('location', locations.value)
        formData.append('area', area.value)
        formData.append('details', details.value)
        formData.append('price', price.value)
        formData.append('id', id)
    
        if (owner!==null) {
             
                fetch('http://localhost/TestPerso1/APIGESTION/property/update/', {
                    method: 'POST',
                    body:formData
               }).then(response => response.json()).then(
                    (data) => {
                       if (data.ok) {
                           alert ("Données bien enregistrées!");
                           myForm.reset()
                           location.href = "index.html";
                       }
                       else{
                        alert ("Oops données non enregistrées!");
                       }
                   }
               )
        }
        
    
})
