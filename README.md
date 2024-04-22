# collection-app

This is a mcFlurry collection application. A passion projet of mine based off many years of travel and mcFlurry's! Please get in contact if you are also passionate about global mcDonald's products...

On a more technical note, this was one of my first full scale projects integrating a front end of basic html and css with php and a mySQL database.

The user has the ability to view my collection, click on individual entries to see more information and move pages. They also have the ability to add an entry though the uploading image functionality does not yet work. 

Note: Aware there are a few bugs with pagination and sorting which I am working on!

# Installing

Ensure you have the correct docker image set up by following [this](https://github.com/iO-Academy/docker-image) guide.

Clone this repo: 

```
git clone git@github.com:JBHarrison5/collection-app.git
```

Import the database ```mcflurryCollection_2024-02-26.sql``` and call it ```mcflurryCollection```. Then check the database details on line 23 of functions.php are correct for your set up.

type http://localhost:1234/collection-app/ into you browser

# Authors

John Harrison - [@JBHarrison5](https://github.com/JBHarrison5)

# Links

Live App - https://2024-johnh.dev.io-academy.uk/collectionApp/
