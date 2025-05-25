import {
  LayoutDashboard
} from "lucide-react";

import { SidebarData } from "@/types/sidebar";

export const sidebarData: SidebarData = {
  navGroups: [
    {
      title: "General",
      items: [
        {
          title: "Dashboard",
          url: "/user",
          icon: LayoutDashboard,
        },
      ],
    },
  ],
};
