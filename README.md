# SHCC Test

This is a repository hosting the test for SuperHero Cheesecake.

## 1. Installation
1. Make sure you have you Homestead, Docker or Laragon environment all set up.
1. `git clone https://github.com/filipeneves/shcc-test .`
1. `composer install`
1. Use Postman to test the API. Endpoint: `[POST] http://localhost/v1/image/upload`

That's it! Make sure you are either using Homestead, Docker or Laragon running all the services required for this to work.

## 2. Endpoints
#### [POST] /v1/image/upload

##### Inputs

Type: `form-data`

`file` - The picture

`filters` - JSON string of the filters. Example:
```json
[
    {
        "effect": "blur",
        "values": [
            30
        ]
    },
    {
        "effect": "pixelate",
        "values": [
            10
        ]
    },
    {
        "effect": "colorize",
        "values": [
            -100,
            0,
            100
        ]
    }
]
```

##### Returns
PNG image with filters applied

##### Samples (with the JSON above)
![My daughter](https://i.imgur.com/cozJobn.png)
![My blue pixelated daughter](https://i.imgur.com/MZdAwCx.png)