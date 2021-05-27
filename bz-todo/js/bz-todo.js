$(document).ready(function() {

    var body = $('body');

      body.prepend(`<section class="bz-todo__section">
                      <div id="todo" class="bz-todo todo" job="none">
                          <div class="bz-todo__new todo__new" job="none">
                              <div class="bz-todo__checkbox todo__checkbox" job="none">
                                  <input type="checkbox" class="todo__checkbox--unchecked" job="complete" isComplete="">
                              </div>
                              <div class="bz-todo__enter todo__name" job="none">
                                  <input type="text" placeholder="Enter new task here..." job="enter" class="bz-todo__input todo__input todo__input--new">
                              </div>
                          </div>
                          
                      </div>
                  </section>`); 


});