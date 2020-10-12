<h3> Steps</h3
    <h6>1.</h6><h5>Rename .env.example to .env</h5>
     <h6>2.</h6><h5>create Database</h5>
      <h6>3.</h6><h5>put the localhost name , dbname and user and password of db in env file</h5>
       <h6>4.</h6><h5>run composer install</h5>
     <h6>5.</h6><h5>run php artisan migrate</h5>
      <h6>6.</h6><h5>Run Artisan::call('db:seed', array('--class' => 'AdminSeeder'))</h5>
       <h6>7.</h6><h5>can simply update admin details in Database->Seeds->AdminSeeder class</h5>
