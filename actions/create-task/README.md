# Create task

This action can be used to create a task in onOffice. It utilizes the [onOffice API](https://apidoc.onoffice.de/) together with the [onOffice PHP SDK](https://github.com/onOfficeGmbH/sdk).

## Usage

You can add the action to any GitHub workflow job using the following syntax:

    jobs:
      create-task-example:
        runs-on: ubuntu-latest:
        steps:
          - name: create a task
            uses: onOfficeGmbH/.github/actions/create-task@main
            with:
              token: ${{ secrets.OO_TOKEN }}
              secret: ${{ secrets.OO_SECRET }}
              subject: "Hello, World!"
              ...

The following input parameters are accepted:

| name                 | type   | info                              | required | default |
|----------------------|--------|-----------------------------------|----------|---------|
| token                | string | the onOffice API user token       | yes      |         |
| secret               | string | the onOffice API user secret      | yes      |         |
| api-version          | string | API version (stable\|latest)      | no       | latest  |
| subject              | string | subject of the task               | yes      |         |
| text                 | string | text of the task                  | yes      |         |
| type                 | int    | task type id                      | yes      |         |
| responsible          | string | name of responsible user or group | yes      |         |
| responsible-is-group | int    | 0 for users, 1 for groups         | no       | 1       |
| editor               | string | name of editor (user)             | no       |         |
| project              | int    | related project id                | no       |         |
