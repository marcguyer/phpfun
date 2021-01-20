# Test 2

#### Goals
- The goal of the exercise is to ensure all tests pass in `tests/IndexTest.php`
- Ensure all class methods are covered by tests
     

```
/**
 * mock data set (extend it to include more records)
 */

[['first_name' => 'John', 'last_name' => 'Doe']]
```

1. Set up logic that takes in a mock associative array data set, runs a 
`first_name` filter on the dataset and returns a json string of the filtered response.
2. The logic should use null coalescing to provide default values for fields not provided `zip` `city` `state`
3. Reuse the logic above to create a new method that will return the same data set as an array/object
depending on a $type param passed to the method.

Use `./vendor/bin/phpunit tests` to execute tests

> Sample method and test provided in `src/index.php` & `tests/IndexTest.php`

