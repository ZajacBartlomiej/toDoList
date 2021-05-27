$(document).ready(function() {

    var body = $('body');

    body.prepend(`<section class="bz-todo__section">
                    <div id="todo" class="bz-todo todo" job="none">
                        <div class="bz-todo__new todo__new" job="none">
                            <div class="bz-todo__checkbox todo__checkbox" job="none">
                                <input type="checkbox" class="todo__checkbox--unchecked" job="complete" isComplete="">
                            </div>
                            <div class="bz-todo__enter todo__name" job="none">
                                <input type="text" placeholder="Enter new task here..." job="enter" class="bz-todo__input todo__input bz-todo__enter--input">
                            </div>
                        </div>
                        
                    </div>
                </section>`); 

    let ToDoLIST =[];

    console.log(ToDoLIST);
    
    let id = 0;
    
    $(".cart").append(ToDoLIST);
    
    let inputGet = document.querySelector('.bz-todo__enter--input');
    
    const todo = document.getElementsByClassName("cart");
    
    const CHECK = "cart__checkbox--checked";
    const UNCHECK = "cart__checkbox--unchecked";
    
    const CHECKED = "checked";
    const UNCHECKED = "";
    
    function addItem (task, id, done, trash) {
    
    if ( trash ){ return; }
    
    const DONE = done ? CHECK : UNCHECK;
    
    const CHECKBOX = done ? CHECKED : UNCHECKED;
    
    const text = `
    <div class="row cart__task" job="none">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 cart__checkbox" job="none">
    <input type="checkbox" class="${DONE}" job="complete" number="${id}" ${CHECKBOX}/>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 cart__name" job="none">
    <input type="text" value="${task}" job="name" number="${id}" class="cart__input cart__input--task">
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 cart__remove center" job="delete" number="${id}">
    x
    </div>
    </div>
    `
    $(".cart__tasks").prepend(text);
    }


    document.addEventListener("keypress", function(event) {
    
        if (event.key === "Enter") {
          console.log("keypress");
          
          const task = inputGet.value;
          
          if (task) {
            addItem(task, id, false, false);
            ToDoLIST.push(
              {
                name: task,
                id: id,
                done: false,
                trash: false
              }
              );
              inputGet.value = '';
              id++;
              localStorage.setItem("bz-todo-list", JSON.stringify(ToDoLIST));
            }
          }
        });
        
        function completeItem ( element ){
          element.classList.toggle(CHECK);
          element.classList.toggle(UNCHECK);
          element = element.attributes.number.value;
          
          ToDoLIST[element].done = ToDoLIST[element].done ? false : true;
          
          var elementToCrossOut = document.querySelector('input[number="'+element+'"][job="name"]');
          
          if (elementToCrossOut.getAttribute("style")=="text-decoration: line-through red;") {
            // elementToCrossOut.style.textDecoration = "none";
          } else {
            // elementToCrossOut.style.textDecoration = "line-through red";
          }        
        }
        function removeItem( element ){
          element.parentNode.parentNode.removeChild(element.parentNode);
          element = element.attributes.number.value;
          ToDoLIST[element].trash = true;
          localStorage.setItem("bz-todo-list", JSON.stringify(ToDoLIST));
          
        }
        function updateItem( element ){
          elementID = element.attributes.number.value;
          var name = element.value;
          
          ToDoLIST[elementID].name = name;
          localStorage.setItem("bz-todo-list", JSON.stringify(ToDoLIST));
          
        }

        const list = document.getElementById('cart');
    
    list.addEventListener("click", function(event){
      let element = event.target;
      const elementJOB = element.attributes.job.value;
      if (elementJOB == "complete") {
        completeItem( element );
      } else if(elementJOB == "delete"){
        removeItem( element );
      }
      else if(elementJOB == "name"){
        document.addEventListener("keypress", function(event) { 
          if (event.key === "Enter") {
            updateItem( element );
          }
        });
        
      }
      localStorage.setItem("bz-todo-list", JSON.stringify(ToDoLIST));
    })
    
    
    let data = localStorage.getItem("bz-todo-list");
    if (data) {
      ToDoLIST = JSON.parse(data);
      loadItem(ToDoLIST);
      id = ToDoLIST.lenght;
    } else {
      ToDoLIST = [];
      id = 0;
    }
    
    function loadItem( array ){
      array.forEach(function(item){
        addItem(item.name, item.id, item.done, item.trash);
      });
    }
    
    id = ToDoLIST.length;

});