const myForm = document.getElementById('myForm');

let owner = document.getElementById('owner');
let tel = document.getElementById('tel');
let locations = document.getElementById('location');
let area = document.getElementById('area');
let details = document.getElementById('details');
let price = document.getElementById('price');

myForm.addEventListener('submit', function(e){
    
    e.preventDefault();
    
    const formData = new FormData()
    formData.append('owner', owner.value)
    formData.append('tel', tel.value)
    formData.append('location', locations.value)
    formData.append('area', area.value)
    formData.append('details', details.value)
    formData.append('price', price.value)

    if (owner!==null) {
         
            fetch('http://192.168.64.2/TestPerso1/APIGESTION/property/save/', {
                method: 'POST',
                body:formData
           }).then(response => response.json()).then(
                (data) => {
                   if (data.ok) {
                       alert ("Données bien enregistrées!");
                       myForm.reset()
                   }
                   else{
                    alert ("Oops données non enregistrées!");
                   }
               }
           )
    }
    

})

