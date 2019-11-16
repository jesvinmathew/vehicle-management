
<div class="medium-10 medium-push-2">
    <br />
    <form class="form-horizontal" role="form" method="post" ng-app name="myForm" ng-submit="submit()">
        Manufacture Details
        <label class="columns" ng-class="{true: 'error'}[(myForm.name.$touched|| submitted) && myForm.name.$invalid]">
            <div class="medium-2 columns">Contact Name</div>
            <div class="medium-6 columns">
                <input type="text" name="name" ng-model="name" required placeholder="Contact person Name" />
            </div>
            <div class="medium-4 columns">
                <span style="color:red" ng-show="(myForm.name.$touched|| submitted) && myForm.name.$invalid">
                    <span ng-show="myForm.name.$error.required">Name is required.</span>
                </span>
            </div>
        </label>

        <label class="columns">
            <div class="medium-2 columns">Company Name</div>
            <div class="medium-6 columns">
                <input type="text" name="cName" ng-model="cName" required placeholder="Company Name" />
            </div>
            <div class="medium-4 columns">
                <span style="color:red" ng-show="(myForm.cName.$touched || submitted) && myForm.cName.$invalid">
                    <span ng-show="myForm.cName.$error.required">Company Name is required.</span>
                </span>
            </div>
        </label>
        
        <label class="columns">
            <div class="medium-2 columns">Bill Address</div>
            <div class="medium-6 columns">
                <textarea name="address" ng-model="address" required></textarea>
            </div>
            <div class="medium-4 columns">
                <span style="color:red" ng-show="(myForm.address.$touched || submitted)&& myForm.address.$invalid">
                    <span ng-show="myForm.address.$error.required">Please enter the address.</span>
                </span>
            </div>
        </label>
        
        <label class="columns">
            <div class="medium-2 columns">Contact number</div>
            <div class="medium-6 columns">
                <input type="text" name="cNum" ng-model="cNum" required placeholder="Contact number" />
            </div>
            <div class="medium-4 columns">
                <span style="color:red" ng-show="(myForm.cNum.$touched|| submitted) && myForm.cNum.$invalid">
                    <span ng-show="myForm.cNum.$error.required">Please enter the contact number.</span>
                </span>
            </div>
        </label>
        
        <label class="columns">
            <div class="medium-2 columns">Mobile</div>
            <div class="medium-6 columns">
                <input type="text" name="mob" placeholder="Mobile Number" />
            </div>
            <div class="medium-4 columns"></div>
        </label>
                
        <label class="columns">
            <div class="medium-2 columns">Email</div>
            <div class="medium-6 columns">
                <input type="email" name="email" ng-model="email" placeholder="Email id" />
            </div>
            <div class="medium-4 columns">
                <span style="color:red" ng-show="myForm.email.$invalid || submitted">
                    <span ng-show="myForm.email.$error.email">Invalid email id.</span>
                </span>
            </div>
        </label>
        <div class="columns">
            <div class="medium-5 medium-push-4 columns">
                <button type="submit" class="small round button" ng-click="submitted=true">Submit</button>
            </div>
        </div>
    </form>
</div>
<script>
</script>