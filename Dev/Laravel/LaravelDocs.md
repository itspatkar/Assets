## Composer/Artisan Commands

- **Create New Laravel Project :**
    ```
    composer create-project laravel/laravel <ProjectName>
    ```
- **Run Laravel Project :**
    ```
    php artisan serve
    ```
- **Crete Controller :**
    ```
    php artisan make:controller <ControllerName>
    ```
- **Crete Resource Controller :**
    ```
    php artisan make:controller <ResourceController> --resource
    ````
- **Create DB Model :**
    ```
    php artisan make:model <Model> 
    ```
- **Create Migration Table :**
    ```
    php artisan make:migration <create_users_table>
    ```
- **Run Migrations :**
    ```
    php artisan migrate
    ```
- **Create Component :**
    ```
    php artisan make:component <input>
    ```
- **Create Import/Export Model :**
    ```
    php artisan make:import <ModelImport> --model=<Model>
    ```
    ```
    php artisan make:export <ModelExport> --model=<Model>
    ```

### Generate New ENV:
- Copy `.env.example` -> `.env`
- `php artisan config:clear`
- `php artisan config:cache`
- `php artisan key:generate`

### Run Existing Laravel Project:
- `composer install`
- `composer dump-autoload`
- Generate ENV
- `php artisan serve`


### Git Commands:

#### Pull from main branch
- If self branch has uncommited changes :
    ```
    git stash
    ```
- Switch to main branch :
    ```
    git checkout branch (git checkout development)
    ```
- Pull changes from main branch :
    ```
    git pull origin main_branch (git pull origin development)
    ```
- Switch to self branch :
    ```
    git checkout branch (git checkout swati_uat)
    ```
- Merge main branch to self branch :
    ```
    git merge main_branch (git merge development)
    ```
- Commit changes in self branch
    ```
    git stash apply (to apply stashed changes)

    git add <file>
    
    git commit -m "<commit message>"

    git push
    ```
