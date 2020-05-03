> about the project

This website links three types of people [normal people - store owners - delivery guys]. and divide the city into hoods. each store will register in a hood and the normal person will also register in a hood, and finally, the delivery man will also register in the same hood. the registered account in hood1 can't see the accounts registered in hood2.
This project was a participation in a Hackathon to propose solutions to the problems that occurred after COVID-19, this project is the solution for the stores closing


>How does the project work:

##### landing page of the project
###### click on Register
![1](stores_website/1.png)



##### supplier account creation
###### fill the form and submit
![2](stores_website/2.png)


##### supplier dashboard [before having a store]
###### click on create store
![3](stores_website/3.png)


##### store creation form
###### fill the form and submit
![4](stores_website/4.png)


##### supplier account dashboard [after having a store]
###### click on add product
![5](stores_website/5.png)


##### adding product form [square images are prefared]
###### fill the form then submit
![6](stores_website/6.png)


##### the store
###### logout and create buyer account
![7](stores_website/7.png)


##### creating buyer account [same hood]
###### fill the form then submit
![8](stores_website/8.png)


##### buyer account dashboard
###### can see only stores in the same hood
![9](stores_website/9.png)


##### store products
###### here the buyer can see the products and fill his cart
![10](stores_website/10.png)


##### buyer cart
###### here is the products will be listed in the cart
![11](stores_website/11.png)


##### quantity added ( + )
###### if the buyer wants two panadol extra he can add and remove
![12](stores_website/12.png)


##### after checkout and the address is added
![13](stores_website/13.png)


##### check the order form All Orders page
![14](stores_website/14.png)


##### All Orders page
###### the order is "pending" waiting for a dilevery guy to take it, logout and register as a dilevery guy
![15](stores_website/15.png)


##### creating dilevery account [same hood]
###### fill the form then submit
![16](stores_website/16.png)


##### dilevery account dashboard
###### can see only orders in the same hood
![17](stores_website/17.png)

> requirements
1) composer (laravel)
2) Xampp (database that runs locally)


> install it on your machine
1) `git clone https://github.com/badr-alwattar/stores_website.git`
2) `cd stores_website`
3) change the database name in `.env` file - rename it first from `example.env` to `.env`
4) `php artisan migrate --seed`
5) `php artisan migrate serve`




