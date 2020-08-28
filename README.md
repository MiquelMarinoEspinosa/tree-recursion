# tree-recursion

The `Tree` is a structure which has got `parent` and `children` which they are `Tree` structures as well.
This structure is based on a center node, its ancestors and its descendants.

The code go through the structure recursevily to create a `TreeHierarchy`. This one has method to be transformed to an array structure.

- Tree structure sample

                  Ancestor 1
                      |
                      |
                      |
                  Ancestor 2
                      |
                      |
                      |
                  Parent 3
                      |
                      |
                      |
                    Tree 4
                  /       \
            Child 1       Child 2
          /   |   \            \
        /     |     \         null
      Desc 1 Desc 2 Desc 3

- Tree hierarchy

                Tree 4 -> ParentNode: Parent 3 -> ParentNode: Ancestor 2 -> Parent Node: Ancestor 1 -> null
                       -> ChildNode [
                                      Chilđ1   ->  ChildNode  [
                                                                  Desc 1 -> null
                                                                  Desc 2 -> null
                                                                  Desc 3 -> null
                                                                ]
                                      Child2   -> null
                                    ]

- Tree hierarchy as json object

```json
{
   "tree":"Tree 4",
   "parent":{
      "tree":"Parent 3",
      "parent": {
        "tree":"Ancestor 2",
        "parent": {
          "tree":"Ancestor 1",
          "parent":null
        }
      }
   },
   "children":[
      {
         "tree":"Child 1",
         "children": [
           {
             "tree": "Desc 1",
             "children": null
           },
           {
             "tree": "Desc 2",
             "children": null
           },
           {
             "tree": "Desc 3",
             "children": null
           }
         ]
      },
      {
         "tree":"Child 2",
         "children":null
      }
   ]
```

## Setup

Run the docker container

- docker-compose up

Install the dependencies

- docker exec -i -t tree-recursion.php-cli composer install

Execute unit tests

- docker exec -i -t tree-recursion.php-cli vendor/bin/phpunit

Execute unit tests with coverage

- docker exec -i -t tree-recursion.php-cli vendor/bin/phpunit --coverage-html coverage
- open coverage/index.html
