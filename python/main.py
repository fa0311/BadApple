import json
import time
data = open("data/data.json", 'r')
data = json.load(data)
textlist = ["ち", "ん", "ぽ"]
i = 0
for frame in data:
    output = ""
    start = time.time()
    for row in frame:
        output += "\n"
        for flag in row:
            if flag == 1:
                output += textlist[i % 3]
                i += 1
            else:
                output += "　"
    print(output + "\033["+str(len(data[0]))+"A", end="")
    time.sleep(0.05 - (time.time() - start))
