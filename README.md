# Recipes-Book

School project with app with Laravel

# Code review

1. web.php:7 and 11 - You are linking to 2 controllers GuestController and DbController, none of those controllers exist in your project. You should remove those routes.
2. The whole project has a lot of out commented code, you should remove it.
3. controller.php is empty, you should remove it.
4. DashboardController could be named HomeController because it is the home page of your app.
5. DashBoardController.php: 11 - In DashBoardcontroller this model exists and is imported but is never called: use App\Models\Recipe_ingredient
6. recipe.blade.php: 14 - if you add more than 1 recipe it wont show up because you are calling for [0]
7. allot of controllers - Allot of controllers are sending created at and updated at, your database doesn't have these columns so you should remove them. Timestamps are automatically added to your database with migrations as long as you don't remove them and do it trough laravel.
8. LoginController.php:15 - 17 - login has a logout function, you already have a logout function in your AuthController, you should remove this method.
9. AddRecipesController.php: 18 - 20: You are saving auth user and never using it.
10. addRecipe.blade.php: you are writing in Sweinglish, you should write in English or Swedish.
11. RecipeController.php: You are using query builder here, instead you could make it much more simpler by using a model and then looping trough each post in your view.
12. in public there are a bunch of js files, these should be located in resources/js.
13. There are css files in the public folder, these should be in the css folder in resources.
14. RuneTest.php: This file should be split into many smaller files instead of 1 big file.
15. In Recipes table in your DB, your instructions could be in a separate table to make it easier to view for when the instruction become very long.
16. Very few comments trough out the whole project.
17. Models should be named in camelCase.
18. web.php: 44 - If user is not auth and goes to /logout and error appears, there should be an ->Auth.
19. AddRecipeToDbController.php: 25 - there is no max to the instructions or any other validations so the user could write infinite lines if they wanted to and slow down you DB.
20. Categories only has a model an no Controller with validation, so others can hack or send anything to you DB.
