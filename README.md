# Local Rag and LLM

Brackets refer to line numbers in python file.

## for mac OS

- Install https://ollama.com/ and open so it is running (serve)
- Open terminal and pull in the LLM
- ollama run llama2
  - currently uses llama2 (52) as hardcoded in the python script
- - You can close terminal as this model is now on your mac

## wordpress get your posts as JSON

- download the zip in the repo
- visit your wordpress admin page and add a new plug in / Upload plugin
- choose the zip and acivate once installed

## Create a new page

- create a new page on your blog and add just the following shortcode [wordpress_export_to_json]
- save / visit that page (this will execute the shortcode)

  - I got some errors making the page but it was ok.

- Check your "/wp-content" folder for a file "post-content.json".
- file name is hardcoded into wordpress script (42)
  - If the file did not create, try first creating a blank file "post-content.json"(your site may not have permission to create file in the directory, but it may be able to update).

## Run queries against your json file

- Open rag.json.py in VS Code
- Edit the user input (39) and the prompt (43) and the location of your json (4)
- Right click in the python window and select run python - run python file in terminal
- Wait for output

## Sources

will list here asap
