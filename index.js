
// modal
const modal = document.querySelector('#mymodal');
const btn = document.querySelector('#open');
const closemodal = document.querySelector('.modal-close')

btn.addEventListener('click', (e) => modal.style.display = 'grid')
closemodal.addEventListener('click', (e) => modal.style.display = 'none')

window.onclick = (e) => {
    if(e.target.id == 'mymodal'){
        modal.style.display = 'none';
        
    }
}



const inputs = Array.from(document.querySelectorAll('.input'))
const formtitle = document.querySelector('.form-title');
const submitbtn = document.querySelector('.submit');

// edit btn
const editbtn = document.querySelectorAll('.edit-link');
Array.from(editbtn).forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        let columns = Array.from(e.currentTarget.parentElement.parentElement.children);
        columns.pop(); columns.pop();
        
        for(let i = 0; i<columns.length; i++)
        {
            // console.log(inputs[i].id);
            if(inputs[i].id == columns[i].id){
                inputs[i].value = columns[i].textContent;
                submitbtn.name = 'bt_update';
                formtitle.textContent = "Update Customer";
                modal.style.display = 'grid'
            }
        }
    })
})



//delete btn
const deletebtn = document.querySelectorAll('.delete-link');

Array.from(deletebtn).forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();

        if(confirm('Do you want to delete this customer?')){
            let columns = Array.from(e.currentTarget.parentElement.parentElement.children);

            columns.pop(); columns.pop();
        
            for(let i = 0; i<columns.length; i++)
            {
                
                if(inputs[i].id == columns[i].id){
                    inputs[i].value = columns[i].textContent;
                    submitbtn.name = 'bt_delete';
                    formtitle.textContent = "Delete Customer";
                    modal.style.display = 'grid'
                }
            }
        }
    })
})
