<div class="col-xs-12 col-sm-12">
                      <div class="well">
                          <!---login form code start-->
                          <form id="loginForm" method="POST" action="/login/" novalidate="novalidate">
                              <div class="form-group">
                                <label for="username" class="control-label">Email Address</label>
                                  <input type="text" class="form-control" id="email" name="email" required="required" placeholder="Email id" />
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" required="required" title="Password" placeholder="Password" />
                                  <span class="help-block"></span>
                              </div>
                              <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name="remember" id="remember"> Remember login
                                  </label>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                              <a href="#forgotBtn" id="forgotBtn" class="forgotBtn btn btn-default btn-block">Forgot Password</a>
                          </form>
                           <!---login form code End-->
                            <!---Register  form code start-->
                          <form id="registerForm" method="POST" action="/login/" novalidate="novalidate" style="display:none;">
                              <div class="form-group">
                                  <label for="username" class="control-label">Name</label>
                                  <input type="text" class="form-control" id="name" name="name" required="" title="Please Enter Your Name" placeholder="Name">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="emailid" class="control-label">Email Address</label>
                                  <input type="email" class="form-control" id="emailid" name="emailid" required="required" title="Please enter your Email id" placeholder="Email Address" /> 
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password" placeholder="Password" /> 
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Confirm Password</label>
                                  <input type="password" class="form-control" id="cpassword" name="cpassword" required="required" title="password" placeholder="Confirm Password" />
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                              <a href="#forgotBtn" id="forgotBtn" class="forgotBtn btn btn-default btn-block">Forgot Password</a>
                          </form>
                           <!---Register form code End-->
                            <!---forget password form code End-->
                            <form id="forgrtPasswordForm" novalidate="novalidate" style="display:none;">
                              <div class="form-group">
                                <label for="email" class="control-label">Email Address</label>
                                  <input type="text" class="form-control" id="email" name="email" required="required" placeholder="Email id" />
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Send</button>
                          </form>
                             <!---forget password Form code End-->
                      </div>
                  </div>