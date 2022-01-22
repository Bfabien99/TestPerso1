id=localStorage.getItem("identifiant")
var invocation = new XMLHttpRequest();
const url = 'http://localhost/TestPerso1/APIGESTION/property/'+id+'/';
const box = document.querySelector('.box');

fetch(url)
    .then
    (
       async (data) => { 
           data = await data.json()
           console.log(data)
        if(data.ok) {
           

            //  let div  = document.createElement('div')
            //  div.className += "element"
            //  let H4 = document.createElement('h4')
            //  H4.innerText = "Id: "+datas.id 
            //  let H44 = document.createElement('h4')
            //  H44.innerText = "Proprio: "+datas.owner
            //   div.appendChild(H4)
            //   div.appendChild(H44)
    
            //   box.appendChild(div)
         
            box.innerHTML += 
            `   
                <div class="element">
                    <p class="text1">
                    <h4>id:  ${data.results.id}</h4>
                    </p>
                    <p class="text1">
                    <h4>Nom:   ${data.results.owner}</h4>
                    </p>
                    <p class="text2">
                    <h4>Numéro:   ${data.results.tel}</h4>
                    </p>
                    <p class="text3">
                    <h4>Posté le:   ${data.results.postdate}</h4>
                    </p>
                    <p class="text4">
                    <h4>Localisation:   ${data.results.location}</h4>
                    </p>
                    
                </div>
            `
        } else {
            alert("error")
        }
   
    }
    )